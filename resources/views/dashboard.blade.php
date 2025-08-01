<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-gray-900 ">
                CRM Dashboard
            </h2>
            <div class="text-sm text-black text-semibold">
                PT. Smart
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- Statistics Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
                {{-- Dynamic Stats based on Role --}}
                @if(auth()->user()->role === 'manager')
                    {{-- Manager sees Pending Projects --}}
                    <div class="group bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 rounded-xl p-6 hover:shadow-lg hover:shadow-gray-100/50 dark:hover:shadow-gray-900/50 transition-all duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">
                                    Pending Projects
                                </p>
                                <p class="text-2xl font-bold text-gray-900 dark:text-white">
                                    {{ $pendingProjects }}
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-br from-amber-400 to-orange-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 dark:text-gray-500 mt-3">
                            Waiting for approval
                        </p>
                    </div>
                @else
                    {{-- Sales sees Active Leads --}}
                    <div class="group bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 rounded-xl p-6 hover:shadow-lg hover:shadow-gray-100/50 dark:hover:shadow-gray-900/50 transition-all duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">
                                    Active Leads
                                </p>
                                <p class="text-2xl font-bold text-gray-900 dark:text-white">
                                    {{ $activeLeads }}
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 dark:text-gray-500 mt-3">
                            Not converted or failed
                        </p>
                    </div>
                @endif

                {{-- Customers Stats (for both roles) --}}
                <div class="group bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 rounded-xl p-6 hover:shadow-lg hover:shadow-gray-100/50 dark:hover:shadow-gray-900/50 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">
                                Total Customers
                            </p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">
                                {{ $customerCount }}
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-3">
                        All registered customers
                    </p>
                </div>

                {{-- Products Stats --}}
                <div class="group bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 rounded-xl p-6 hover:shadow-lg hover:shadow-gray-100/50 dark:hover:shadow-gray-900/50 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">
                                Total Products
                            </p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">
                                {{ \App\Models\Product::count() }}
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-3">
                        All available products
                    </p>
                </div>

                <div class="group bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 rounded-xl p-6 hover:shadow-lg hover:shadow-gray-100/50 dark:hover:shadow-gray-900/50 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">
                                Additional Info
                            </p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">
                                Soon
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-gray-400 to-gray-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-3">
                        More features coming
                    </p>
                </div>
            </div>

            {{-- Welcome Message --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 rounded-xl p-8">
                <div class="max-w-3xl">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center mr-4">
                            <span class="text-2xl font-bold text-white">{{ substr(auth()->user()->name, 0, 1) }}</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Welcome back, {{ auth()->user()->name }}
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 capitalize">
                                {{ auth()->user()->role }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            @if(auth()->user()->role === 'manager')
                                Oversee all operations, approve projects, and manage your team effectively.
                            @else
                                Manage leads, create projects, and track your sales performance.
                            @endif
                        </p>
                        
                        @if(auth()->user()->role === 'manager' && $pendingProjects > 0)
                            <div class="inline-flex items-center px-4 py-2 bg-amber-50 dark:bg-amber-900/20 text-amber-700 dark:text-amber-300 rounded-lg border border-amber-200 dark:border-amber-800">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                </svg>
                                <span class="text-sm font-medium">
                                    {{ $pendingProjects }} project{{ $pendingProjects > 1 ? 's' : '' }} awaiting approval
                                </span>
                            </div>
                        @elseif(auth()->user()->role === 'sales' && $activeLeads > 0)
                            <div class="inline-flex items-center px-4 py-2 bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300 rounded-lg border border-blue-200 dark:border-blue-800">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                                <span class="text-sm font-medium">
                                    {{ $activeLeads }} active lead{{ $activeLeads > 1 ? 's' : '' }} to work on
                                </span>
                            </div>
                        @endif
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-100 dark:border-gray-800">
                        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            {{ $customerCount }} customers in system
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>