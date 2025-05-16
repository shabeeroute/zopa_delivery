<?php $__env->startSection('title', 'My Purchases - Zopa Food Drop'); ?>

<?php $__env->startSection('content'); ?>
<div class="container my-2">
    <div class="text-center mb-4">
        <h2 class="position-relative d-inline-block px-4 py-2"> My Purchases</h2>
        <div class="mt-1" style="width: 120px; height: 2px; background: #000000; margin: auto; border-radius: 2px;"></div>
    </div>

    <div class="tab-content mt-3" id="orderTabsContent">
        <!-- Active Orders -->
        <div class="tab-pane fade show active" id="active-orders" role="tabpanel">
            <div class="row" id="purchases-container">
                <?php echo $__env->make('partials.purchases_list', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $(document).on('click', '#load-more', function () {
        const button = $(this);
        const nextPage = button.data('next-page');
        button.prop('disabled', true).text('Loading...');

        $.ajax({
            url: '<?php echo e(route("customer.purchases")); ?>', // or update if route has a different name
            type: 'GET',
            data: { page: nextPage },
            success: function (response) {
                button.closest('div').remove(); // remove previous button
                $('#purchases-container').append(response); // append new content
            },
            error: function () {
                alert('Failed to load more purchases.');
                button.prop('disabled', false).text('Load More');
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\zopa_delivery\resources\views\pages\purchases.blade.php ENDPATH**/ ?>