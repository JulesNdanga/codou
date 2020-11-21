<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php if(Auth::user()->user_type == 'vendor'): ?> <?php echo e(Helper::translation(2935,$translate)); ?> <?php else: ?> <?php echo e(Helper::translation(2860,$translate)); ?> <?php endif; ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</head>

<body class="preload dashboard-upload">

    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(Auth::user()->user_type == 'vendor'): ?>
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(2862,$translate)); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(URL::to('/upload-item')); ?>"><?php echo e(Helper::translation(2935,$translate)); ?></a>
                            </li>
                           <li>
                                <?php echo e($type_name->item_type_name); ?>

                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title"><?php echo e(Helper::translation(2935,$translate)); ?> <span class="lnr lnr-arrow-right"></span> <?php echo e($type_name->item_type_name); ?></h1>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    
    
    
    <section class="dashboard-area">
        
        <?php echo $__env->make('dashboard-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end /.dashboard_menu_area -->

        <div class="dashboard_contents">
            <div class="container">
               
               <div>
        <?php if($message = Session::get('success')): ?>
               <div class="alert alert-success" role="alert">
                                <span class="alert_icon lnr lnr-checkmark-circle"></span>
                                <?php echo e($message); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span class="lnr lnr-cross" aria-hidden="true"></span>
                                </button>
                            </div>
        <?php endif; ?>
        
        
        <?php if($message = Session::get('error')): ?>
        <div class="alert alert-danger" role="alert">
                                <span class="alert_icon lnr lnr-warning"></span>
                                <?php echo e($message); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span class="lnr lnr-cross" aria-hidden="true"></span>
                                </button>
                            </div>
        <?php endif; ?>
        
        <?php if(!$errors->isEmpty()): ?>
        <div class="alert alert-danger" role="alert">
        <span class="alert_icon lnr lnr-warning"></span>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         
        <?php echo e($error); ?>


       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span class="lnr lnr-cross" aria-hidden="true"></span>
        </button>
        </div>
        <?php endif; ?>
        </div>

                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <form action="<?php echo e(route('edit-item')); ?>" class="setting_form" id="item_form" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                            <div class="upload_modules">
                                <div class="modules__title">
                                    <h3><?php echo e(Helper::translation(2936,$translate)); ?></h3>
                                </div>
                                

                                <div class="modules__content">
                                    
                                    
                                    <input type="hidden" name="item_type" value="<?php echo e($edit['item']->item_type); ?>">
                                    <input type="hidden" name="type_id" value="<?php echo e($typer_id); ?>">
                                    
                                    <div class="form-group">
                                        <label for="product_name"><?php echo e(Helper::translation(2938,$translate)); ?> <sup>*</sup>
                                            <span>(<?php echo e(Helper::translation(2939,$translate)); ?>)</span>
                                        </label>
                                        <input type="text" id="item_name" name="item_name" class="text_field" value="<?php echo e($edit['item']->item_name); ?>" data-bvalidator="required,maxlen[100]">
                                    </div>
                                    
                                    <div class="form-group no-margin">
                                        <p class="label"><?php echo e(Helper::translation(2940,$translate)); ?> <sup>*</sup></p>
                                        <textarea name="item_shortdesc" rows="6"  class="form-control" data-bvalidator="required"><?php echo e($edit['item']->item_shortdesc); ?></textarea>
                                    </div>
                                    

                                    <div class="form-group no-margin">
                                        <p class="label"><?php echo e(Helper::translation(2941,$translate)); ?> <sup>*</sup></p>
                                        <textarea name="item_desc" id="summary-ckeditor" rows="6"  class="form-control" data-bvalidator="required"><?php echo e(html_entity_decode($edit['item']->item_desc)); ?></textarea>
                                    </div>
                                </div>
                                <!-- end /.modules__content -->
                            </div>
                            <!-- end /.upload_modules -->

                            <div class="upload_modules module--upload">
                                <div class="modules__title">
                                    <h3><?php echo e(Helper::translation(2942,$translate)); ?></h3>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">
                                    <div class="form-group">
                                        <div class="upload_wrapper">
                                            <p class="label"><?php echo e(Helper::translation(2943,$translate)); ?> <sup>*</sup>
                                                <span>(<?php echo e(Helper::translation(2946,$translate)); ?> : 80x80px)</span>
                                            </p>

                                            <div class="custom_upload">
                                                <label for="thumbnail">
                                                    <input type="file" id="item_thumbnail" name="item_thumbnail" class="files"><br/>
                                        <?php if($edit['item']->item_thumbnail!=''): ?>
                                        <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($edit['item']->item_thumbnail); ?>" alt="<?php echo e($edit['item']->item_name); ?>" class="item-thumb">
                                        <?php else: ?>
                                        <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($edit['item']->item_name); ?>" class="item-thumb">
                                        <?php endif; ?>
                                                    
                                                </label>
                                            </div>
                                            

                                           
                                        </div>
                                        <!-- end /.upload_wrapper -->
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <div class="upload_wrapper">
                                            <p class="label"><?php echo e(Helper::translation(2945,$translate)); ?> <sup>*</sup>
                                                <span>(<?php echo e(Helper::translation(2946,$translate)); ?> : 361x230px)</span>
                                            </p>

                                            <div class="custom_upload">
                                                <label for="thumbnail">
                                                    <input type="file" id="item_preview" name="item_preview" class="files"><br/>
                                        <?php if($edit['item']->item_preview!=''): ?>
                                        <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($edit['item']->item_preview); ?>" alt="<?php echo e($edit['item']->item_name); ?>" class="item-thumb">
                                        <?php else: ?>
                                        <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($edit['item']->item_name); ?>" class="item-thumb">
                                        <?php endif; ?>
                                                    
                                                </label>
                                            </div>
                                            

                                           
                                        </div>
                                        <!-- end /.upload_wrapper -->
                                    </div>
                                    <!-- end /.form-group -->

                                    <div class="form-group">
                                        <div class="upload_wrapper">
                                            <p class="label"><?php echo e(Helper::translation(2947,$translate)); ?> <sup>*</sup>
                                                <span>(<?php echo e(Helper::translation(2948,$translate)); ?>)</span>
                                            </p>

                                            <div class="custom_upload">
                                                <label for="main_file">
                                                    <input type="file" id="item_file" name="item_file" class="files">
                                                    <?php if($allsettings->site_s3_storage == 1): ?>
                                                    <?php $fileurl = Storage::disk('s3')->url($edit['item']->item_file); ?>
                                                    <a href="<?php echo e($fileurl); ?>" download><?php echo e($edit['item']->item_file); ?></a>
                                                    <?php else: ?>
                                                    <?php if($edit['item']->item_file!=''): ?>
                                                    <a href="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($edit['item']->item_file); ?>" download><?php echo e($edit['item']->item_file); ?></a>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    
                                                </label>
                                            </div>
                                            

                                            
                                        </div>
                                        <!-- end /.upload_wrapper -->
                                    </div>
                                    <!-- end /.form-group -->

                                    <div class="form-group mb-0 pb-0">
                                        <div class="upload_wrapper">
                                            <p class="label"><?php echo e(Helper::translation(2950,$translate)); ?>

                                                <span>(<?php echo e(Helper::translation(2946,$translate)); ?> : 750x430px)</span>
                                            </p>

                                            <div class="custom_upload">
                                                <label for="screenshot">
                                                    <input type="file" id="item_screenshot" name="item_screenshot[]" class="files"><br/><br/><?php $__currentLoopData = $item_image['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                    <div class="item-img"><img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($item->item_image); ?>" alt="<?php echo e($item->item_image); ?>" class="item-thumb">
                                                    <a href="<?php echo e(url('/edit-item')); ?>/dropimg/<?php echo e(base64_encode($item->itm_id)); ?>" onClick="return confirm('<?php echo e(Helper::translation(2892,$translate)); ?>');" class="drop-icon"><span class="lnr lnr-trash drop-icon"></span></a>
                                                    </div>
                                                    
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                </label>
                                            </div>
                                            

                                            
                                        </div>
                                        <!-- end /.upload_wrapper -->
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="tags">Video Preview Type (optional)</label>
                                        <div class="select-wrap select-wrap2">
                                                <select name="video_preview_type" id="video_preview_type" class="text_field">
                                                <option value=""></option>
                                                    <option value="youtube" <?php if($edit['item']->video_preview_type == 'youtube'): ?> selected <?php endif; ?>>Youtube</option>
                                                    <option value="mp4" <?php if($edit['item']->video_preview_type == 'mp4'): ?> selected <?php endif; ?>>MP4</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                    </div>
                                    
                                    <div id="youtube" <?php if($edit['item']->video_preview_type == 'youtube'): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                        <label for="tags"><?php echo e(Helper::translation(2967,$translate)); ?>

                                            
                                        </label>
                                        <input type="text" id="video_url" name="video_url" class="text_field" data-bvalidator="required,url" value="<?php echo e($edit['item']->video_url); ?>">
                                        <small>(<?php echo e(Helper::translation(2968,$translate)); ?> : https://www.youtube.com/watch?v=C0DPdy98e4c)</small>
                                    </div>
                                    
                                    <div id="mp4" <?php if($edit['item']->video_preview_type == 'mp4'): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                        <label for="tags">Upload MP4 Video <sup>*</sup></label>
                                        <input type="file" id="video_file" name="video_file" class="text_field files"><small>(MP4 - file only)</small>
                                        <?php if($allsettings->site_s3_storage == 1): ?>
                                        <?php $videofileurl = Storage::disk('s3')->url($edit['item']->video_file); ?>
                                        <br/><a href="<?php echo e($videofileurl); ?>" download><?php echo e($edit['item']->video_file); ?></a>
                                        <?php else: ?>
                                        <br/><?php if($edit['item']->video_file!=''): ?>
                                        <a href="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($edit['item']->video_file); ?>"  download><?php echo e($edit['item']->video_file); ?></a>                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- end /.form-group -->
                                </div>
                                <!-- end /.upload_modules -->
                            </div>
                            <!-- end /.upload_modules -->

                            <div class="upload_modules">
                                <div class="modules__title">
                                    <h3><?php echo e(Helper::translation(2951,$translate)); ?></h3>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">
                                    <div class="row">
                                    
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="category"><?php echo e(Helper::translation(2952,$translate)); ?> <sup>*</sup></label>
                                        <div class="select-wrap select-wrap2">
                                            <select name="item_category" id="item_category" class="text_field" data-bvalidator="required">
                                            <option value="">Select</option>
                                            <?php $__currentLoopData = $categories['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <option value="category_<?php echo e($menu->cat_id); ?>" <?php if($cat_name == 'category'): ?> <?php if($menu->cat_id == $cat_id): ?> selected="selected" <?php endif; ?> <?php endif; ?>><?php echo e($menu->category_name); ?></option>
                                                <?php $__currentLoopData = $menu->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="subcategory_<?php echo e($sub_category->subcat_id); ?>" <?php if($cat_name == 'subcategory'): ?> <?php if($sub_category->subcat_id == $cat_id): ?> selected="selected" <?php endif; ?> <?php endif; ?>> - <?php echo e($sub_category->subcategory_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="lnr lnr-chevron-down"></span>
                                        </div>
                                    </div>
                                    </div>
                                    
                                    
                                  
                                       
                                    </div>
                                    <?php if(count($attribute['fields']) != 0): ?>
                                    <?php $__currentLoopData = $attri_field['display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="tags"><?php echo e($attribute_field->attr_label); ?><sup>*</sup></label>
                                            <?php 
                                                $field_value=explode(',',$attribute_field->attr_field_value); 
                                                $checkpackage=explode(',',$attribute_field->item_attribute_values);
                                                ?>
                                                <?php if($attribute_field->attr_field_type == 'multi-select'): ?>
                                                <div class="select-wrap select-wrap2">
                                                <select  name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" class="text_field" multiple="multiple" data-bvalidator="required">
                                                <?php $__currentLoopData = $field_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($field); ?>" <?php if(in_array($field,$checkpackage)): ?> selected="selected" <?php endif; ?>><?php echo e($field); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                </div>
                                                <?php endif; ?>
                                                <?php if($attribute_field->attr_field_type == 'single-select'): ?>
                                                <div class="select-wrap select-wrap2">
                                                <select name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" class="text_field" data-bvalidator="required">
                                                  <option value=""></option>
                                                  <?php $__currentLoopData = $field_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <option value="<?php echo e($field); ?>" <?php if($attribute_field->item_attribute_values == $field): ?> selected <?php endif; ?>><?php echo e($field); ?></option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                                </div>
                                                <?php endif; ?>
                                                <?php if($attribute_field->attr_field_type == 'textbox'): ?>
                                                <input name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" type="text" class="text_field" data-bvalidator="required">
                                                <?php endif; ?>
                                            </div>
                                       </div> 
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <?php $__currentLoopData = $attri_field['display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e($attribute_field->attr_label); ?> <span class="require">*</span></label>
                                                <?php $field_value=explode(',',$attribute_field->attr_field_value); ?>
                                                <?php if($attribute_field->attr_field_type == 'multi-select'): ?>
                                                <div class="select-wrap select-wrap2">
                                                <select  name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" class="text_field" multiple="multiple" data-bvalidator="required">
                                                <?php $__currentLoopData = $field_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($field); ?>"><?php echo e($field); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                </div>
                                                <?php endif; ?>
                                                <?php if($attribute_field->attr_field_type == 'single-select'): ?>
                                                <div class="select-wrap select-wrap2">
                                                <select name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" class="text_field" data-bvalidator="required">
                                                  <option value=""></option>
                                                  <?php $__currentLoopData = $field_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <option value="<?php echo e($field); ?>"><?php echo e($field); ?></option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                                </div>
                                                <?php endif; ?>
                                                <?php if($attribute_field->attr_field_type == 'textbox'): ?>
                                                <input name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" type="text" class="text_field" data-bvalidator="required">
                                                <?php endif; ?>
                                                
                                            </div>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <!-- end /.row -->
                                    
                                    
                                    <div class="form-group">
                                        <label for="tags"><?php echo e(Helper::translation(2966,$translate)); ?>

                                            
                                        </label>
                                        <input type="text" id="demo_url" name="demo_url" class="text_field" value="<?php echo e($edit['item']->demo_url); ?>" data-bvalidator="url">
                                        
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                                <label for="selected"><?php echo e(Helper::translation(2969,$translate)); ?> <sup>*</sup></label>
                                                <div class="select-wrap select-wrap2">
                                                <select name="free_download" id="free_download" class="text_field" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="1" <?php if($edit['item']->free_download == 1): ?> selected="selected" <?php endif; ?>><?php echo e(Helper::translation(2970,$translate)); ?></option>
                                                    <option value="0" <?php if($edit['item']->free_download == 0): ?> selected="selected" <?php endif; ?>><?php echo e(Helper::translation(2971,$translate)); ?></option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                            </div>
                                    
                                    <div class="form-group">
                                                <label for="selected"><?php echo e(Helper::translation(2972,$translate)); ?></label>
                                                <div class="select-wrap select-wrap2">
                                                <select name="item_flash_request" id="item_flash_request" class="text_field">
                                                <option value=""></option>
                                                    <option value="1" <?php if($edit['item']->item_flash_request == 1): ?> selected="selected" <?php endif; ?>><?php echo e(Helper::translation(2970,$translate)); ?></option>
                                                    <option value="0" <?php if($edit['item']->item_flash_request == 0): ?> selected="selected" <?php endif; ?>><?php echo e(Helper::translation(2971,$translate)); ?></option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                            <small>(<?php echo e(Helper::translation(2973,$translate)); ?>)</small>
                                            </div>
                                       
                                    <div class="form-group">
                                        <label for="tags"><?php echo e(Helper::translation(2974,$translate)); ?>

                                           
                                        </label>
                                        <textarea name="item_tags" id="item_tags" class="text_field"><?php echo e($edit['item']->item_tags); ?></textarea>
                                        <small>(<?php echo e(Helper::translation(2975,$translate)); ?>)</small>
                                    </div>
                                </div>
                                <!-- end /.upload_modules -->
                            </div>
                            <!-- end /.upload_modules -->
                            
                            <div class="upload_modules with--addons">
                                <div class="modules__title">
                                    <h3><?php echo e(Helper::translation(2976,$translate)); ?></h3>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="rlicense"><?php echo e(Helper::translation(2977,$translate)); ?><sup>*</sup></label>
                                                <div class="select-wrap select-wrap2">
                                                <select name="future_update" id="future_update" class="text_field" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="1" <?php if($edit['item']->future_update == 1): ?> selected="selected" <?php endif; ?>><?php echo e(Helper::translation(2970,$translate)); ?></option>
                                                    <option value="0" <?php if($edit['item']->future_update == 0): ?> selected="selected" <?php endif; ?>><?php echo e(Helper::translation(2971,$translate)); ?></option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exlicense"><?php echo e(Helper::translation(2978,$translate)); ?><sup>*</sup></label>
                                                <div class="select-wrap select-wrap2">
                                                <select name="item_support" id="item_support" class="text_field" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="1" <?php if($edit['item']->item_support == 1): ?> selected="selected" <?php endif; ?>><?php echo e(Helper::translation(2970,$translate)); ?></option>
                                                    <option value="0" <?php if($edit['item']->item_support == 0): ?> selected="selected" <?php endif; ?>><?php echo e(Helper::translation(2971,$translate)); ?></option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                            </div>
                                        </div>
                                       

                                    </div>
                                    
                                </div>
                                <!-- end /.modules__content -->
                            </div>
                            
                            
                            <div class="upload_modules with--addons">
                                <div class="modules__title">
                                    <h3><?php echo e(Helper::translation(2888,$translate)); ?></h3>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="rlicense"><?php echo e(Helper::translation(2979,$translate)); ?><sup>*</sup></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><?php echo e($allsettings->site_currency); ?></span>
                                                    <input type="text" id="regular_price" name="regular_price" class="text_field" value="<?php echo e($edit['item']->regular_price); ?>" data-bvalidator="digit,min[1],required">
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exlicense"><?php echo e(Helper::translation(2980,$translate)); ?></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><?php echo e($allsettings->site_currency); ?></span>
                                                    <input type="text" id="extended_price" name="extended_price" class="text_field" value="<?php if($edit['item']->extended_price==0): ?> <?php else: ?> <?php echo e($edit['item']->extended_price); ?> <?php endif; ?>" data-bvalidator="digit,min[1]">
                                                </div>
                                            </div>
                                        </div>
                                       

                                    </div>
                                    
                                </div>
                                <!-- end /.modules__content -->
                            </div>
                            <input type="hidden" name="save_file" value="<?php echo e($edit['item']->item_file); ?>">
                            <input type="hidden" name="save_thumbnail" value="<?php echo e($edit['item']->item_thumbnail); ?>">
                            <input type="hidden" name="save_preview" value="<?php echo e($edit['item']->item_preview); ?>">
                            <input type="hidden" name="save_extended_price" value="<?php echo e($edit['item']->extended_price); ?>">
                            <input type="hidden" name="item_token" value="<?php echo e($edit['item']->item_token); ?>">
                            <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                            <input type="hidden" name="save_video_file" value="<?php echo e($edit['item']->video_file); ?>">
                            <?php if($allsettings->item_approval == 0): ?>
                            <button type="submit" class="btn btn--fullwidth btn--lg theme-button"><?php echo e(Helper::translation(2981,$translate)); ?></button>
                            <?php else: ?>
                            <button type="submit" class="btn btn--fullwidth btn--lg theme-button"><?php echo e(Helper::translation(2876,$translate)); ?></button>
                            <?php endif; ?>
                        </form>
                    </div>
                    <!-- end /.col-md-8 -->

                    <div class="col-lg-4 col-md-5">
                        <aside class="sidebar upload_sidebar">
                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3><?php echo e(Helper::translation(2982,$translate)); ?></h3>
                                </div>

                                <div class="card_content">
                                    <div class="card_info">
                                        <h4><?php echo e(Helper::translation(2983,$translate)); ?></h4>
                                        <p><?php echo e(Helper::translation(2984,$translate)); ?> : <strong>jpeg, jpg, png</strong>
                                         </p>
                                         
                                    </div>

                                    <div class="card_info">
                                        <h4><?php echo e(Helper::translation(2985,$translate)); ?></h4>
                                        <p><?php echo e(Helper::translation(2984,$translate)); ?> : <strong>zip</strong> format
                                        </p>
                                    </div>

                                    
                                </div>
                            </div>
                            <!-- end /.sidebar-card -->

                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3><?php echo e(Helper::translation(2986,$translate)); ?></h3>
                                </div>

                                <div class="card_content">
                                    <p><?php echo e(Helper::translation(2987,$translate)); ?></p><br/>
                                    <p><?php echo e(Helper::translation(2988,$translate)); ?></p>
                                </div>
                            </div>
                            <!-- end /.sidebar-card -->

                            
                            <!-- end /.sidebar-card -->
                        </aside>
                        <!-- end /.sidebar -->
                    </div>
                    <!-- end /.col-md-4 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->
    </section>
    <?php else: ?>
    <?php echo $__env->make('not-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    
   <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
   <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   <script type="text/javascript">
	$(document).ready(function()
	{
	$('#video_preview_type').on('change', function() {
      if ( this.value == 'youtube')
      
      {
	     $("#youtube").show();
		 $("#mp4").hide();
	  }	
	  else if ( this.value == 'mp4')
	  {
	     $("#mp4").show();
		 $("#youtube").hide();
	  }
	  else
	  {
	      $("#mp4").hide();
		  $("#youtube").hide();
	  }
	  
	 });
});
</script> 
</body>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\feberr\resources\views/edit-item.blade.php ENDPATH**/ ?>