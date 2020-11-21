<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    
    <?php echo $__env->make('admin.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    
    <?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        
                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Orders</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
                </div>
            </div>
        </div>
        
         <?php if(session('success')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Orders</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Order ID</th>
                                            <th>Buyer</th>
                                            <th>Vendor Amount</th>
                                            <th>Admin Amount</th>
                                            <th>Processing Fee</th>
                                            <th>Payment Type</th>
                                            <th>Payment Id</th>
                                            <th>Complete Payment? (Localbank Only)</th>
                                            <!--<th>Payment Approval?</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php $__currentLoopData = $itemData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td><?php echo e($order->purchase_token); ?> </td>
                                            <td><a href="<?php echo e(URL::to('/user')); ?>/<?php echo e($order->username); ?>" target="_blank" class="blue-color"><?php echo e($order->username); ?></a></td>
                                            <td><?php echo e($order->vendor_amount); ?> <?php echo e($allsettings->site_currency); ?> </td>
                                            <td><?php echo e($order->admin_amount); ?> <?php echo e($allsettings->site_currency); ?></td>
                                            <td><?php echo e($order->processing_fee); ?> <?php echo e($allsettings->site_currency); ?></td>
                                            <td><?php echo e($order->payment_type); ?></td>
                                            <td><?php if($order->payment_token != ""): ?><?php echo e($order->payment_token); ?><?php else: ?> <span>---</span> <?php endif; ?></td>
                                            <td><?php if($order->payment_type == 'localbank' && $order->payment_status == 'pending'): ?> <a href="orders/<?php echo e(base64_encode($order->purchase_token)); ?>" class="blue-color"onClick="return confirm('Are you sure click to complete payment?');">Click to Complete Payment?</a> <?php else: ?> <span>---</span> <?php endif; ?></td>
                                            <!--<td><a href="#" class="btn btn-success btn-sm"><i class="fa fa-money"></i>&nbsp; Waiting for approval</a></td>-->
                                            <td><a href="order-details/<?php echo e($order->purchase_token); ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>&nbsp; View More</a></td>
                                        </tr>
                                        
                                        <?php $no++; ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

 
                </div>
            </div>
        </div>


    </div>

    


   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html>
<?php /**PATH D:\xampp\htdocs\feberr\resources\views/admin/orders.blade.php ENDPATH**/ ?>