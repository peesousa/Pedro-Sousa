/** @type {import('tailwindcss').Config} */
export default {
  content: [
    // Seus caminhos de conteúdo aqui...
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './app/Filament/**/*.php',
    './app/Livewire/**/*.php',
    './app/Http/Livewire/**/*.php',
  ],
  safelist: [ // <-- ADICIONE ESTA CHAVE E SEU CONTEÚDO
    'prose',
    'prose-lg',
    'lg:prose-xl',
    'prose-invert', // Adicionei a versão invertida também, caso use.
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
  ],
}
