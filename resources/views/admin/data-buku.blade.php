
                    <input type="text" name="penerbit" placeholder="Masukkan Penerbit" 
                        class="w-full p-3 bg-stone-500 text-white placeholder-stone-300 rounded-lg focus:ring-2 focus:ring-red-300 border-none outline-none font-normal">
                </div>

                <div class="pt-4">
                    <button type="submit" class="bg-red-950 text-white px-8 py-3 rounded-xl font-normal hover:bg-red-900 transition shadow-lg">
                        Simpan Data Buku
                    </button>
                </div>
            </div>

            <div class="w-full md:w-1/3 flex flex-col items-center">
                <label for="cover_input" class="cursor-pointer w-full h-[450px] bg-stone-300 border-2 border-dashed border-stone-400 rounded-2xl flex items-center justify-center hover:bg-stone-200 transition-all group relative overflow-hidden">
                    
                    <input type="file" id="cover_input" name="cover" class="hidden" accept="image/*" onchange="previewImage(this)">
                    
                    <div id="image_preview_container" class="absolute inset-0 hidden">
                        <img id="image_preview" src="#" alt="Preview Cover" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                            <p class="text-white text-sm font-normal">Ganti Gambar</p>
                        </div>
                    </div>

                    <div id="placeholder_content" class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-stone-600 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <p class="text-stone-600 font-normal mt-2">Tambah Sampul</p>
                    </div>

                </label>
                <p class="text-sm text-stone-400 mt-4 italic text-center font-light">Klik kotak untuk memilih file gambar</p>
            </div>

        </div>
    </form>