<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Log;
use Str;
   
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', 'detail'
    ];
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    // Eloquent Boot Model
    public static function boot() {
  
        parent::boot();
  
        static::creating(function($item) {            
            // Log::info('Creating event call: '.$item); 
            Log::channel('productLog')->info('Creating event call: '.$item); 
  
            $item->slug = Str::slug($item->name);
        });

        static::created(function($item) {           
            /*
                Write Logic Here
            */ 
  
            // Log::info('Created event call: '.$item);
            Log::channel('productLog')->info('Created event call: '.$item);
        });
  
        static::updating(function($item) {            
            // Log::info('Updating event call: '.$item); 
            Log::channel('productLog')->info('Updating event call: '.$item); 
  
            $item->slug = Str::slug($item->name);
        });

        static::updated(function($item) {  
            /*
                Write Logic Here
            */    
  
            // Log::info('Updated event call: '.$item);
            Log::channel('productLog')->info('Updated event call: '.$item);
        });
  
        static::deleted(function($item) {            
            // Log::info('Deleted event call: '.$item); 
            Log::channel('productLog')->info('Deleted event call: '.$item); 
        });
    }
}