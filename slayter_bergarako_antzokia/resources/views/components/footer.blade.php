<!-- resources/views/components/footer.blade.php -->

<footer class="w-full text-white py-10 shadow-md mt-auto" style="background-color: #2b56bd;">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
            
            <!-- Columna 1: Sobre el Teatro -->
            <div>
                <h3 class="text-xl font-bold mb-4 tracking-wide border-b border-blue-400 pb-2 inline-block md:block w-full">Antzokia</h3>
                <p class="text-sm leading-relaxed text-blue-100">
                    Bizi ezazu antzerkiaren magia gurekin. Antzezlan, emanaldi eta musikal onenak ingurune historiko eta paregabe batean, Bergarako bihotzean.
                </p>
            </div>

            <!-- Columna 2: Mapa (Corregido para que no desborde) -->
            <div>
                <h3 class="text-xl font-bold mb-4 tracking-wide border-b border-blue-400 pb-2 inline-block md:block w-full">Kokapena / Ubicación</h3>
                
                <!-- Le quitamos el md:h-full y usamos h-64 para darle una altura controlada -->
                <div class="w-full h-64 rounded-lg overflow-hidden shadow-lg border border-blue-400">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2912.378585854837!2d-2.4162649234912044!3d43.11757258690828!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd502b045412d719%3A0x614bd5746874a8a6!2sSan%20Martin%20Agirre%20Plaza%2C%204%2C%2020570%20Bergara%2C%20Gipuzkoa!5e0!3m2!1ses!2ses!4v1792578697250!5m2!1ses!2ses" class="w-full h-full border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!-- Columna 3: Contacto y Redes -->
            <div class="flex flex-col h-full">
                <h3 class="text-xl font-bold mb-4 tracking-wide border-b border-blue-400 pb-2 inline-block md:block w-full">Kontaktua</h3>
                <div class="text-sm text-blue-100 space-y-2 mb-6 flex-grow">
                    <p>📍 San Martin Agirre Plaza, 4</p>
                    <p>20570 Bergara, Gipuzkoa</p>
                    <p>📞 +34 943 12 34 56</p>
                    <p>✉️ infoantzokia@bergara.com</p>
                </div>
                
                <!-- Iconos de Redes Sociales -->
                <div class="flex justify-center md:justify-start space-x-4">
                    <a href="#" class="text-blue-200 hover:text-white transition duration-300">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/></svg>
                    </a>
                    <a href="#" class="text-blue-200 hover:text-white transition duration-300">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.024.047-1.379.06-3.808.06-2.43 0-2.784-.013-3.808-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.08c0-2.643.013-2.987.06-4.043.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"/></svg>
                    </a>
                </div>
            </div>

        </div>

        <!-- Copyright -->
        <div class="mt-10 pt-6 border-t border-blue-400 text-center text-sm text-blue-200">
            &copy; {{ date('Y') }} Bergarako Antzokia. Eskubide guztiak erreserbatuta.
        </div>
    </div>
</footer>