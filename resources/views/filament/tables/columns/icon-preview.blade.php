<div class="fi-ta-text grid gap-y-1 px-3 py-2">
    <div class="flex items-center gap-2">
        <x-app-icon :icon="$getState()" style="width: 20px; height: 20px; max-height: 20px; max-width: 20px;" />
        <span class="text-xs text-gray-500 truncate" style="max-width: 150px;">{{ $getState() }}</span>
    </div>
</div>
