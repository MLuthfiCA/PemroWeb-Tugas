@extends('user.layouts.app')

@section('content')
<div class="py-10 space-y-8">
    
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 animate-fade-up">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">Contact Us</h1>
            <p class="text-gray-500 mt-2">Have questions? We'd love to hear from you. Get in touch with ReadSpace Library.</p>
        </div>
    </div>

    <!-- Contact Form & Info Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <!-- Contact Information -->
        <div class="md:col-span-1 space-y-6">
            
            <!-- Email -->
            <div class="glass-panel p-6 border-white/60 animate-fade-up delay-100 group">
                <div class="flex items-center gap-4 mb-3">
                    <div class="p-3 rounded-2xl bg-burgundy-50 text-burgundy-500 group-hover:bg-burgundy-500 group-hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Email</p>
                        <a href="mailto:readspacelibrary@poltek.ac.id" class="text-lg font-bold text-gray-800 hover:text-burgundy-500 transition-colors">readspacelibrary@poltek.ac.id</a>
                    </div>
                </div>
            </div>

            <!-- Phone -->
            <div class="glass-panel p-6 border-white/60 animate-fade-up delay-200 group">
                <div class="flex items-center gap-4 mb-3">
                    <div class="p-3 rounded-2xl bg-burgundy-50 text-burgundy-500 group-hover:bg-burgundy-500 group-hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Phone</p>
                        <a href="tel:+622167352800" class="text-lg font-bold text-gray-800 hover:text-burgundy-500 transition-colors">(021) 673528</a>
                    </div>
                </div>
            </div>

            <!-- Address -->
            <div class="glass-panel p-6 border-white/60 animate-fade-up delay-300 group">
                <div class="flex items-start gap-4 mb-3">
                    <div class="p-3 rounded-2xl bg-burgundy-50 text-burgundy-500 group-hover:bg-burgundy-500 group-hover:text-white transition-colors flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Address</p>
                        <p class="text-sm font-semibold text-gray-800">Ahmad Yani Street, Batam City, Kepulauan Riau, Indonesia</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Contact Form -->
        <div class="md:col-span-2">
            <div class="glass-panel p-8 border-white/60 animate-fade-up delay-100 shadow-2xl shadow-red-50">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Send us a Message</h2>
                
                <form action="#" method="POST" class="space-y-5">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Full Name</label>
                            <input type="text" placeholder="Your Name" required 
                                class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm transition-all placeholder-gray-300">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Email Address</label>
                            <input type="email" placeholder="your.email@example.com" required 
                                class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm transition-all placeholder-gray-300">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Subject</label>
                        <input type="text" placeholder="What is this about?" required 
                            class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm transition-all placeholder-gray-300">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Message</label>
                        <textarea placeholder="Your message here..." rows="6" required 
                            class="w-full px-4 py-3 border border-white bg-white/50 rounded-2xl focus:outline-none focus:ring-4 focus:ring-red-100 font-medium text-sm transition-all resize-none placeholder-gray-300"></textarea>
                    </div>

                    <button type="submit" class="w-full px-6 py-4 bg-burgundy-500 text-white rounded-2xl font-bold shadow-lg shadow-red-100 hover:bg-maroon transition-all transform active:scale-95 flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Send Message
                    </button>

                </form>
            </div>
        </div>

    </div>

</div>
@endsection
