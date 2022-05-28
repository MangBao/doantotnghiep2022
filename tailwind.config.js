const defaultTheme = require("tailwindcss/defaultTheme");
const plugin = require("tailwindcss/plugin");
const Color = require("color");
const colors = require("./utilities/colors");
// const borderWidth = require("./utilities/borders");
const keyframes = {
    fadeInDown: {
        "0%": {
            opacity: "0",
            transform: "translateY(-10px)",
        },
        "100%": {
            opacity: "1",
            transform: "translateY(0)",
        },
    },
};
const animation = {
    fadeInDown: "fadeInDown 0.8s ease-out",
};

module.exports = {
    purge: ["./resources/views/**/*.blade.php", "./resources/css/**/*.css"],
    theme: {
        themeVariants: ["dark"],
        customForms: (theme) => ({
            default: {
                "input, textarea": {
                    "&::placeholder": {
                        color: theme("colors.gray.400"),
                    },
                },
            },
        }),
        ...colors,
        extend: {
            maxHeight: {
                0: "0",
                xl: "36rem",
            },
            minHeight: {
                0: "0",
                400: "400px",
            },
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
            keyframes,
            animation,
        },
    },

    variants: {
        scrollbar: ['rounded'],
        opacity: ["responsive", "hover", "focus", "disabled"],
        backgroundColor: [
            "hover",
            "focus",
            "active",
            "odd",
            "dark",
            "dark:hover",
            "dark:focus",
            "dark:active",
            "dark:odd",
        ],
        display: ["responsive", "dark"],
        textColor: [
            "focus-within",
            "hover",
            "active",
            "dark",
            "dark:focus-within",
            "dark:hover",
            "dark:active",
        ],
        placeholderColor: ["focus", "dark", "dark:focus"],
        borderColor: ["focus", "hover", "dark", "dark:focus", "dark:hover"],
        divideColor: ["dark"],
        boxShadow: ["focus", "dark:focus"],
    },

    plugins: [
        require('tailwind-scrollbar'),
        require("@tailwindcss/ui"),
        require("tailwindcss-multi-theme"),
        require("@tailwindcss/custom-forms"),
        plugin(({ addUtilities, e, theme, variants }) => {
            const newUtilities = {};
            Object.entries(theme("colors")).map(([name, value]) => {
                if (name === "transparent" || name === "current") return;
                const color = value[300] ? value[300] : value;
                const hsla = Color(color).alpha(0.45).hsl().string();

                newUtilities[`.shadow-outline-${name}`] = {
                    "box-shadow": `0 0 0 3px ${hsla}`,
                };
            });

            addUtilities(newUtilities, variants("boxShadow"));
        }),
    ],
};
