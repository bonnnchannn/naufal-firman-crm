<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            CRM Dashboard - PT. Smart
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- Statistics Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                {{-- Dynamic Stats based on Role --}}
                @if(auth()->user()->role === 'manager')
                    {{-- Manager sees Pending Projects --}}
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                                        <span class="text-white text-sm font-bold">P</span>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                            Pending Projects
                                        </dt>
                                        <dd class="text-lg font-medium text-gray-900 dark:text-white">
                                            {{ $pendingProjects }}
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                                Projects waiting for approval
                            </div>
                        </div>
                    </div>
                @else
                    {{-- Sales sees Active Leads --}}
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                        <span class="text-white text-sm font-bold">L</span>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                            Active Leads
                                        </dt>
                                        <dd class="text-lg font-medium text-gray-900 dark:text-white">
                                            {{ $activeLeads }}
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                                Leads that are not converted or failed
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Customers Stats (for both roles) --}}
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center">
                                    <span class="text-white text-sm font-bold">C</span>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                        Total Customers
                                    </dt>
                                    <dd class="text-lg font-medium text-gray-900 dark:text-white">
                                        {{ $customerCount }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                            All registered customers
                        </div>
                    </div>
                </div>

                {{-- Products Stats --}}
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                    <span class="text-white text-sm font-bold">P</span>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                        Total Products
                                    </dt>
                                    <dd class="text-lg font-medium text-gray-900 dark:text-white">
                                        {{ \App\Models\Product::count() }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                            All available products
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center">
                                    <span class="text-white text-sm font-bold">+</span>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                        Additional Info
                                    </dt>
                                    <dd class="text-lg font-medium text-gray-900 dark:text-white">
                                        Coming Soon
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Welcome Message --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">
                        Welcome, {{ auth()->user()->name }}!
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        @if(auth()->user()->role === 'manager')
                            As a manager, you can oversee all operations, approve projects, and manage the team.
                            @if($pendingProjects > 0)
                                You have <strong>{{ $pendingProjects }}</strong> project(s) waiting for your approval.
                            @else
                                No projects are currently pending approval.
                            @endif
                        @else
                            As a sales representative, you can manage leads, create projects, and track your performance.
                            @if($activeLeads > 0)
                                You have <strong>{{ $activeLeads }}</strong> active lead(s) to work on.
                            @else
                                All your leads have been processed.
                            @endif
                        @endif
                    </p>
                    <div class="mt-6">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Total customers in system: <strong>{{ $customerCount }}</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
