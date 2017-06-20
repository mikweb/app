<?php

namespace App\Modules\Pages\Models;

use App\Core\Model;
use Shared\Database\ORM\FileField\FileFieldTrait;
use Str;
use App\Helpers\Preset;

class Page extends Model {

   use FileFieldTrait;

   public $timestamps = true;
   public $files = array(
      'image' => array(
         'path' => ROOTDIR . 'assets/images/pages/:unique_id-:file_name',
         'defaultPath' => ROOTDIR . 'assets/images/pages/no-image.png',
      ),
      'head_image' => array(
         'path' => ROOTDIR . 'assets/images/pages/:unique_id-:file_name',
         'defaultPath' => ROOTDIR . 'assets/images/pages/no-head-image.png',
      ),
   );

   /**
    * 
    * @return type
    */
   public function user() {
      return $this->belongsTo('App\Modules\Users\Models\User');
   }

   /**
    * 
    * @param type $type
    * @param type $size
    */
   public static function latestBloc($type = 'article', $size = 3) {
      return Page::where('visible', 'Yes')
            ->where('published_date', '<=', date('Y-m-d H:i:s'))
            ->where('type', $type)
            ->orderBy('updated_at', 'desc')
            ->take($size)
            ->get();
   }

   /**
    * 
    * @return type
    */
   public function icon() {
      return Page::pageIcon($this->type);
   }

   /**
    * 
    * @return string
    */
   public static function pageIcon($type) {
      switch ($type) {
         case "article":
            return "mdi mdi-script";
         case "page":
            return "mdi mdi-page-layout-body";
         case "product":
            return "mdi mdi-flag";
         default:
            return "mdi mdi-flag";
      }
   }

   /**
    * 
    * @param type $str
    * @return string
    */
   public static function getSlug($str, $id = -1) {

      $slug = Str::slug($str);
      $idx = 0;
      $slugSearch = $slug;
      $content = Page::where('slug', $slugSearch)
         ->where('id', '!=', $id)
         ->first();
      while (!empty($content)) {
         $idx++;
         $slugSearch = $slug . Model::slugSuffix($idx);
         $content = Page::where('slug', $slugSearch)
            ->where('id', '!=', $id)
            ->first();
      }
      return $slugSearch;
   }

   /**
    * 
    * @param array $options
    * @return type
    */
   public function save(array $options = array()) {
      parent::save($options);

      // Generate Images
      if (!empty($this->image)) {
         Preset::create($this->image, 'thumbnail', '150x100');
         Preset::create($this->image, 'medium', '600x400');
      }
      if (!empty($this->head_image)) {
         Preset::create($this->head_image, 'facebook', '728x385');
      }
      return;
   }

   /**
    * 
    */
   public function delete() {
      Preset::remove($this->image, 'thumbnail');
      Preset::remove($this->image, 'medium');
      Preset::remove($this->head_image, 'facebook');

      return parent::delete();
   }

}
