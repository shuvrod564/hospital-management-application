<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h1>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fs-2 font-semibold mb-0">{{ $title }}</h2>

                <a href="{{ route('admin.users.create') }}" class="btn btn-primary mobile__circle">
                    <i class="fas fa-plus"></i>
                    <span>Add New</span>
                </a>
            </div>

            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card border-0 shadow-sm rounded-3 mb-4 overflow-hidden">
                <div class="table-responsive"> 
                    <table class="table align-middle mb-0" style="--bs-table-bg: transparent;">
                        <thead>
                            <tr class="text-muted small border-bottom" style="font-size: 0.85rem; background-color: #ffffff;">
                                <th class="ps-4 py-3 fw-semibold">Name</th>
                                <th class="py-3 fw-semibold">Email</th>
                                <th class="py-3 fw-semibold">Role</th> 
                                <th class="pe-4 py-3 fw-semibold text-end">Action</th>
                            </tr>
                        </thead> 
                        <tbody class="bg-white">
                            @forelse($users as $user)
                                <tr class="border-bottom">
                                    <td class="ps-4 py-3">{{ $user->name }}</td>
                                    <td class="ps- py-3">{{ $user->email }}</td> 
                                    <td class="ps-4 py-3">
                                        @php
                                            $roleClass = match ($user->role) {
                                                'admin' => 'bg-secondary text-white',
                                                'doctor' => 'bg-primary text-white',
                                                'receptionist' => 'bg-success',
                                                default => 'bg-danger',
                                            };
                                        @endphp
    
                                        <span class="badge {{ $roleClass }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td class="d-flex gap-2 py-3 actions "> 
                                        <a href="{{ route('admin.' . $routeName . '.edit', $user) }}" class="btn btn-sm btn-outline-warning btn-action" title="Edit">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a> 
                                        <form action="{{ route('admin.' . $routeName . '.destroy', $user) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
    
                                            <button type="submit" class="btn btn-sm btn-outline-danger btn-action" onclick="return confirm('Delete this user?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form> 
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-3 border text-center">No users found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>