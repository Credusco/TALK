<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
				<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<h5><?php echo e($message->name); ?></h5>
					<p><?php echo e($message->email); ?> - <?php echo e($message->date); ?></p>
					<p class="fs-5 col-md-8"><?php echo e($message->contenu); ?></p>
					<hr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<div class="mb-3">
					<form method="POST" action="<?php echo e(route('messages')); ?>">
                        <?php echo csrf_field(); ?>
						<label for="message-text" class="col-form-label">Message:</label>
						<textarea class="form-control" name="messages" id="message-text" required></textarea><br>
						<button type="submit" class="btn btn-primary btn-sm px-4">Send</button>
					</form>
				  </div>
			  </main>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\talk\resources\views/home.blade.php ENDPATH**/ ?>