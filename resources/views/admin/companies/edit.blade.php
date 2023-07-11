<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-4xl mx-auto mt-8">
                        <div class="mb-4">
                            <h1 class="text-3xl font-bold">
                                Update Company
                            </h1>
                            <div class="flex justify-end mt-5">
                                <a class="px-2 py-1 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600" href="{{ route('companies.index') }}">Back</a>
                            </div>
                        </div>

                        <div class="flex flex-col mt-5">
                            <div class="flex flex-col">
                                <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">

                                    @if ($errors->any())
                                        <div class="p-3 rounded bg-red-500 text-white m-3">
                                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">

                                        <form action="{{ route('companies.update',$company->id) }}" method="POST" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf

                                            <div>
                                                <label class="block text-sm font-bold text-gray-700" for="title">Name</label>
                                                <input type="text" name="name" value="{{$company->name}}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Name">
                                            </div>

                                            <div class="mt-4">
                                                <label class="block text-sm font-bold text-gray-700" for="title">Email</label>
                                                <input type="text" name="email" value="{{$company->email}}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Email">
                                            </div>

                                            <div class="mt-4">
                                                <label class="block text-sm font-bold text-gray-700" for="title">Website</label>
                                                <input type="text" name="website" value="{{$company->website}}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Website">
                                            </div>

                                            <div class="mt-4">
                                                <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                                                    <span class="mt-2 text-base leading-normal">Select logo</span>
                                                    <input type="file" name="image" class="hidden">
                                                </label>
                                            </div>

                                            <div class="flex items-center justify-start mt-4 gap-x-2">
                                                <button type="submit" class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-green-100 bg-green-500 hover:bg-green-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">Update</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
