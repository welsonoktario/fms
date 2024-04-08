export default {
  plugins: ["@shufo/prettier-plugin-blade"],
  overrides: [
    {
      files: ["*.blade.php"],
      options: {
        parser: "blade",
        printWidth: 120,
        tabWidth: 2,
        sortTailwindcssClasses: true,
        noPhpSyntaxCheck: false,
        trailingCommaPHP: true,
      },
    },
  ],
};
