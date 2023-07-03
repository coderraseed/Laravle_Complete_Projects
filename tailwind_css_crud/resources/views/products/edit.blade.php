<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="">

        <nav class="bg-gray-800">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="hidden md:block">
                        <a href="/"
                            class="text-gray-300 hover:text-white px-4 py-2 rounded-md font-bold">Products</a>
                    </div>
                    <div>
                        <a href="/create" class="text-gray-300 hover:text-white font-bold py-2 px-4 rounded">
                            New Product
                        </a>
                    </div>
                </div>
            </div>
        </nav>


        <div class="bg-gray-700">


            <div class="container mx-auto p-8">
                @if ($massage = Session::get('success'))
                    <div class="text-gray-300 max-w-md mx-auto">
                        <strong>{{ $massage }}</strong>
                    </div>
                @endif
                <form class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6" action="/{{ $product->id }}/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <div class="bg-gray-700 text-white py-2 border rounded">
                            <h2 class="text-center uppercase">Edit Product</h2>
                            <h2 class="text-center uppercase">id no-{{ $product->id}}</h2>
                        </div>

                        <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                        <input type="text" id="name" name="name" value="{{old('name', $product->name)}}"
                            class="w-full border border-gray-300 px-4 py-3 rounded-md focus:outline-none focus:border-blue-500"
                            placeholder="Enter product name" />
                        @if ($errors->has('name'))
                            <span class="text-red-800">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="mb-6">
                        <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                        <textarea id="description" name="description" rows="4"
                            class="w-full border border-gray-300 px-4 py-3 rounded-md resize-none focus:outline-none focus:border-blue-500"
                            placeholder="Enter product description">{{old('description', $product->description)}}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-red-800">{{$errors->first('description')}}</span>
                        @endif
                    </div>

                    <div class="mb-6">
                        <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                        <input type="file" id="image" name="image" accept="image/*" class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500" />
                        @if ($errors->has('image'))
                            <span class="text-red-800">{{$errors->first('image')}}</span>
                        @endif
                      </div>


                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded">
                        Update
                    </button>
                </form>
            </div>

        </div>
    </div>




</body>

</html>
