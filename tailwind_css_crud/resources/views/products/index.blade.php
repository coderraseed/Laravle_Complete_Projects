<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.0-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>


<body>

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

    <div class="bg-gradient-to-r from-blue-500 to-purple-500 py-8">
        <div class="container mx-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-6 uppercase font-bold text-left">Ser No</th>
                        <th class="py-3 px-6 font-bold uppercase text-left">Name</th>
                        <th class="py-3 px-6 font-bold uppercase text-left">Description</th>
                        <th class="py-3 px-6 font-bold uppercase text-left">Image</th>
                        <th class="py-3 px-6 font-bold uppercase text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="py-4 px-6">{{$loop->index+1}}</td>
                            <td class="py-4 px-6">{{$product->name}}</td>
                            <td class="py-4 px-6">{{$product->description}}</td>
                            <td class="py-4 px-6">
                                <img src="products/{{$product->images}}" alt="Product Image"
                                    class="w-12 h-12 object-cover rounded-full">
                            </td>
                            <td class="py-4 px-6 items-end">
                                <div class="flex space-x-2 justify-end">
                                    <div class="tooltip">
                                        <a href="/{{ $product->id }}/edit"
                                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-3 rounded-full border-2 border-white">
                                            <i class="fas fa-pen"></i>
                                            <span class="tooltiptext">Edit</span>
                                        </a>
                                    </div>
                                    <div class="tooltip">
                                        <a href="/{{ $product->id }}/delete" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-3 rounded-full">
                                            <i class="fas fa-trash-alt"></i>
                                            <span class="tooltiptext">Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>













</body>

</html>
