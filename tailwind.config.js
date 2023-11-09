const theme = require('./theme.json');
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './*.php',
        './**/*.php',
        './resources/css/*.css',
        './resources/js/*.js',
        './safelist.txt'
    ],
    theme: {
        container: {
            padding: {
                DEFAULT: '0',
            },
					screens: {
						sm: '100%',
						md: '100%',
						lg: '100%',
						xl: '100%',
					}
        },
        extend: {
            colors: tailpress.colorMapper(tailpress.theme('settings.color.palette', theme)),
            fontSize: tailpress.fontSizeMapper(tailpress.theme('settings.typography.fontSizes', theme)),
					 spacing: {
						'30': '120px',
					 }
        },
        screens: {
            'xs': '480px',
            'sm': '600px',
            'md': '768px',
            'lg': '1024px',
            'xl': tailpress.theme('settings.layout.wideSize', theme)
        },
			fontFamily: {
				default: ['Lausanne', 'sans-serif'],
				heading:['Eliza', 'serif'],
			}
    },
    plugins: [
        tailpress.tailwind
    ],
	safelist: [
		{
			pattern: /^(p|m)(\w?)-/,
			variants: ['sm', 'md', 'lg'],
		}
	],
};
