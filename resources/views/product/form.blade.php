<section class="h-screen flex items-center">
    <form class="max-w-sm mx-auto min-w-96 shadow p-4">
        {{-- 
      <div class="mb-6">
          <label for="error" class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500">Your
              name</label>
          <input type="text" id="error"
              class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
              placeholder="Error input">
          <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, snapp!</span> Some
              error message.</p>
      </div> --}}

        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                Name</label>
            <input type="text" id="name" name="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Product Name" value="{{ $product->name ?? old('name') }}" required />
        </div>
        <div class="mb-5">
            <label for="stroke" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stroke</label>
            <input type="number" id="stroke" name="stroke" aria-describedby="helper-text-explanation"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="00" value="{{ $product->stroke ?? old('stroke') }}" required />
        </div>
        <div class="mb-5">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
            <input type="number" id="price" name="price aria-describedby="helper-text-explanation"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="$00" value="{{ $product->price ?? old('price') }}" required />
        </div>
        <div class="mb-5">

            @isset($product)
                <img class="h-auto max-w-full mb-2" src="{{ $product->image }}" alt="image description">
            @endisset


            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Product
                Image</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="file_input" type="file">
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            @isset($product)
                Update
            @else
                Add
            @endisset
            A Product
        </button>
    </form>
</section>
