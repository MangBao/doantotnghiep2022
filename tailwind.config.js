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
            minWidth: {
                '136': '136px',
                '168': '168px',
                '176': '176px',
                '230': '230px',
            },
            maxWidth: {
                '136': '136px',
                '168': '168px',
            },
            minHeight: {
                0: "0",
                400: "400px",
            },
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
            spacing: {
                '100': '25.75rem',
            },
            width: {
                '462': '462px',
            },
            keyframes,
            animation,
        },
    },

    variants: {
        width: ["responsive", "hover", "focus", "active", "group-hover"],
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
        display: ["responsive", "dark", "group-hover",],
        textColor: [
            "focus-within",
            "hover",
            "active",
            "dark",
            "dark:focus-within",
            "dark:hover",
            "dark:active",
            "group-hover",
        ],
        placeholderColor: ["focus", "dark", "dark:focus"],
        borderColor: ["focus", "hover", "dark", "dark:focus", "dark:hover"],
        divideColor: ["dark"],
        boxShadow: ["focus", "dark:focus"],
        transition: ["responsive", "hover", "focus", "group-hover"],
        textDecoration: ["hover", "focus", "active", "dark", "dark:hover", "dark:focus", "dark:active"],
    },

    plugins: [
        require('tailwind-scrollbar'),
        require("@tailwindcss/ui"),
        require("tailwindcss-multi-theme"),
        require("@tailwindcss/custom-forms"),
        plugin(({ addUtilities, e, theme, variants }) => {
            const newUtilities = {};
            const decorationVariants = {};

            Object.entries(theme("colors")).map(([name, value]) => {
                if (name === "transparent" || name === "current") return;
                const color = value[300] ? value[300] : value;
                const hsla = Color(color).alpha(0.45).hsl().string();

                newUtilities[`.shadow-outline-${name}`] = {
                    "box-shadow": `0 0 0 3px ${hsla}`,
                };

                decorationVariants[`.decoration-color-${e(name)}`] = {
                    "text-decoration-color": `${color}`
                }
            });

            addUtilities(newUtilities, variants("boxShadow"));
            addUtilities(decorationVariants, variants("textDecoration"))
        }),
    ],
};
