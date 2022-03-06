<div>
    @if ($publication->resource)
        <div class="flex items-center text-gray-400 cursor-pointer text-center justify-center" wire:click="download">
            <i class="text-lg fas fa-download"></i>
            <p class="ml-2 text-sm">Descargar recurso</p>
        </div>
    @endif
</div>
