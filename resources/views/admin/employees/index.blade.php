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
                    <div class="mb-4">
                        <div class="flex justify-end mt-5">
                            <a class="px-2 py-1 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600" href="{{ route('employees.create') }}"> Create Employee</a>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="p-3 rounded bg-green-500 text-green-100 mb-4 m-3">
                            <span>{{ $message }}</span>
                        </div>
                    @endif
                    
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-left text-sm font-light">
                                        <thead
                                            class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">#</th>
                                            <th scope="col" class="px-6 py-4">Name</th>
                                            <th scope="col" class="px-6 py-4">Email</th>
                                            <th scope="col" class="px-6 py-4">Company</th>
                                            <th scope="col" class="px-6 py-4">Contact</th>
                                            <th scope="col" class="px-6 py-4">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($employees as $index => $employee)
                                            <tr
                                                class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{$index+1}}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{$employee->first_name}} {{$employee->last_name}}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{$employee->email}}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{$employee->company->name}}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{$employee->phone}}</td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <form onsubmit="return confirm('Are you sure want to delete this record?')" action="{{ route('employees.destroy',$employee->id) }}" method="POST">

                                                        <a href="{{ route('employees.edit',$employee->id) }}" class="text-indigo-600 hover:text-indigo-900 text-gray-600">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                            </svg>
                                                        </a>

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600 hover:text-red-800 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
