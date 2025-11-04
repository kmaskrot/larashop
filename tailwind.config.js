import preset from './vendor/filament/support/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        "./resources/**/*.blade.php",
        './app/Filament/**/*.php',
        './vendor/filament/**/*.blade.php',
    ],
}