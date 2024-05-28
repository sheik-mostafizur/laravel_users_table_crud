<section class="h-screen flex items-center">
    <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}"
        class="max-w-sm mx-auto min-w-96 shadow p-4" method="POST" enctype="multipart/form-data">
        @csrf

        @isset($product)
            @method('PUT')
        @endisset

        <x-forms.input name="name" :value="isset($product) ? $product->name : null" label="Product Name" placeholder="Product" />

        <x-forms.input type="number" name="stroke" :value="isset($product) ? $product->stroke : null" label="Stroke" placeholder="00" />

        <x-forms.input type="number" name="price" :value="isset($product) ? $product->price : null" label="Price" placeholder="$00" />

        <div class="mb-5">
            @isset($product->image)
                <img id="product_image" class="h-auto max-w-full mb-2"
                    src="{{ strpos($product->image, 'http://') || strpos($product->image, 'https://') === 0 ? $product->image : asset('/storage') . '/' . $product->image }}"
                    alt="image description">
            @endisset

            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload Product
                Image</label>
            <input name="image"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="image" type="file" accept="image/*"
                @if (isset($product->image)) onchange="if(this.files[0]) document.querySelector('#product_image').src=window.URL.createObjectURL(this.files[0])" @endif
                @if (!isset($product->image))  @endif value="{{ $product->image ?? old('image') }}">

            @error('image')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
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
