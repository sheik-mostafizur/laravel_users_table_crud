<div class="mb-5">

    <label for="{{ $name }}"
        class="block mb-2 text-sm font-medium @error($name) text-red-700 dark:text-red-500 @else text-gray-900 dark:text-white @enderror">{{ $label }}</label>

    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
        class="@error($name) bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @enderror"
        placeholder="{{ $placeholder }}" value="{{ $value ?? old($name) }}" />

    @error($name)
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
