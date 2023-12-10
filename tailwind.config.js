/** @type {import('tailwindcss').Config} */
export default {

    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",


    ],
    theme: {
        extend: {
            fontFamily: {
                "Peyda-Thin": "Peyda-Thin",
                "Peyda-Light": "Peyda-Light",
                "Peyda-ExtraLight": "Peyda-ExtraLight",
                "Peyda": "Peyda-Regular",
                "Peyda-Medium": "Peyda-Medium",
                "Peyda-SemiBold": "Peyda-SemiBold",
                "Peyda-Bold": "Peyda-Bold",
                "Peyda-ExtraBold": "Peyda-ExtraBold",
                "Peyda-Black": "Peyda-Black",
            },
            colors: {
                "primary": "#111828",
                "secondary": "#fff",
                "tertiary": "#165e76",
                "quaternary": "#10b981",
            }
        },
    },
    plugins: [
        "@tailwindcss/aspect-ratio",
        "@tailwindcss/forms",
        "@tailwindcss/typography",
    ],
}

