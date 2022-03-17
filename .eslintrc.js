module.exports = {
    extends: [
        // 'plugin:@wordpress/eslint-plugin/recommended',
        'eslint:recommended',
        'plugin:eslint-comments/recommended',
        'plugin:@typescript-eslint/recommended',
        'prettier'
    ],
    root: true,
    env: {
        browser: true,
        es6: true,
        jquery: true
    },
    plugins: ['@typescript-eslint'],
    parserOptions: {
        /* global require */
        parser: require.resolve('@typescript-eslint/parser'),
        ecmaVersion: 2021,
        ecmaFeatures: {
            jsx: true
        }
    },
    rules: {
        '@wordpress/no-global-event-listener': 0, // Disable. We don't use React-based components.
        camelcase: 1,
        // // other
        // 'no-redeclare': 'off',
        // 'no-multiple-template-root': 'off',
        // semi: 'off',
        // 'no-unused-vars': 'off',
        // 'func-names': 'off',
        // indent: 'off',
        // 'no-else-return': 'off',
        // 'prefer-arrow-callback': 'off',
        'no-undef': 'off',
        // 'no-use-before-define': 'off',
        // 'comma-dangle': 'off',
        // 'eol-last': 'off',
        // 'no-trailing-spaces': 'off',
        // 'linebreak-style': 'off',
        // 'no-restricted-globals': 'off',
        // 'object-shorthand': 'off',
        // 'no-shadow': 'off',
        'prefer-const': 'warn',
        // 'no-multiple-empty-lines': 'off',
        // 'no-unused-imports': 'off',
        // 'unused-imports/no-unused-imports': 'off',
        // 'no-useless-constructor': 'off',
        // 'no-tabs': 'off',
        // 'arrow-parens': ['error', 'always'],
        // 'no-multi-spaces': ['error'],
        // curly: ['error', 'all'],
        // 'brace-style': ['error', '1tbs', { allowSingleLine: false }],
        // 'object-curly-spacing': 'off',
        // 'standard/no-callback-literal': 'off',
        // quotes: ['error', 'single', { avoidEscape: true }],
        // 'padding-line-between-statements': [
        //     'error',
        //     {
        //         blankLine: 'always',
        //         prev: '*',
        //         next: 'return'
        //     },
        //     {
        //         blankLine: 'never',
        //         prev: 'block',
        //         next: 'block'
        //     }
        // ],
        // 'object-property-newline': 'error',
        // 'object-curly-newline': [
        //     'error',
        //     {
        //         ObjectExpression: {
        //             multiline: true,
        //             consistent: true
        //         },
        //         ObjectPattern: {
        //             multiline: true,
        //             consistent: true
        //         },
        //         ImportDeclaration: {
        //             multiline: true,
        //             consistent: true
        //         },
        //         ExportDeclaration: {
        //             multiline: true,
        //             consistent: true
        //         }
        //     }
        // ],
        // 'array-bracket-spacing': ['error', 'never'],
        // 'space-in-parens': ['error', 'never'],
        // Typescript
        '@typescript-eslint/no-namespace': 'off',
        '@typescript-eslint/indent': ['warn', 4],
        // '@typescript-eslint/no-unused-vars': 'off',
        // '@typescript-eslint/no-unused-imports': 'off',
        '@typescript-eslint/no-var-requires': 'off',
        // '@typescript-eslint/semi': ['off', 'never'],
        // '@typescript-eslint/member-delimiter-style': ['off', { multiline: { delimiter: 'semi' } }],
        // '@typescript-eslint/type-annotation-spacing': ['error', {}],
        // '@typescript-eslint/no-redeclare': 'error',
        // '@typescript-eslint/camelcase': 'off',
        // '@typescript-eslint/explicit-function-return-type': 'off',
        // '@typescript-eslint/explicit-member-accessibility': 'off',
        '@typescript-eslint/no-explicit-any': 'off',
        // '@typescript-eslint/no-parameter-properties': 'off',
        '@typescript-eslint/no-empty-interface': 'off',
        // '@typescript-eslint/ban-ts-ignore': 'off',
        // '@typescript-eslint/no-empty-function': 'off',
        // '@typescript-eslint/no-non-null-assertion': 'off',
        '@typescript-eslint/ban-ts-comment': 'off',
        // '@typescript-eslint/explicit-module-boundary-types': 'off',
        '@typescript-eslint/ban-types': 'off'
        // '@typescript-eslint/no-tabs': 'off',
        // '@typescript-eslint/no-inferrable-types': 'off',
        // '@typescript-eslint/object-curly-spacing': ['error', 'always'],
        // '@typescript-eslint/no-use-before-define': 'off'
    }
}
