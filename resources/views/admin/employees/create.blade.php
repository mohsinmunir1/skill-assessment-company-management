<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-4xl mx-auto mt-8">
                        <div class="mb-4">
                            <h1 class="text-3xl font-bold">
                                Add New Employee
                            </h1>
                            <div class="flex justify-end mt-5">
                                <a class="px-2 py-1 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600" href="{{ route('employees.index') }}">Back</a>
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

                                        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div>
                                                <label class="block text-sm font-bold text-gray-700" for="title">First Name</label>
                                                <input type="text" name="first_name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="First Name">
                                            </div>

                                            <div class="mt-4">
                                                <label class="block text-sm font-bold text-gray-700" for="title">Last Name</label>
                                                <input type="text" name="last_name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Last Name">
                                            </div>

                                            <div class="mt-4">
                                                <label class="block text-sm font-bold text-gray-700" for="title">Email</label>
                                                <input type="text" name="email" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Email">
                                            </div>

                                            <div class="mt-4">
                                                <label class="block text-sm font-bold text-gray-700" for="title">Contact</label>
                                                <input type="text" name="phone" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Phone #">
                                            </div>

                                            <div class="mt-4">
                                                <label class="block text-sm font-bold text-gray-700" for="title">Company</label>
                                                <select name="company_id" data-te-select-init class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                    @foreach($companies as $company)
                                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="flex items-center justify-start mt-4 gap-x-2">
                                                <button type="submit" class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-green-100 bg-green-500 hover:bg-green-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">Submit</button>
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
