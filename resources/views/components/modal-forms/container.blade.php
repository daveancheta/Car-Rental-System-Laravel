<div {{ $attributes }} data-modal-backdrop="static" tabindex="-1" aria-hidden="true" 
  class="modal hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full overflow-hidden bg-black/50">

  <div class="relative p-4 w-full max-w-md max-h-full">
    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700" >
      {{ $slot }}
    </div>
  </div>
</div>