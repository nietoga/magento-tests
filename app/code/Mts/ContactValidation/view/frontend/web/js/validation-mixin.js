define([
    'jquery',
    'mage/translate',
], ($) => {
    'use strict';

    const getEmailDomain = (email) => {
        const parts = email.split('@');

        if (parts.length === 2) {
            return parts[1];
        }

        return false;
    };

    return (target) => {
        $.validator.addMethod(
            'validate-email-domain',
            (value, element, param) => {
                const emailDomain = getEmailDomain(value);

                if (emailDomain) {
                    return !param.forbiddenDomains.includes(emailDomain);
                }

                return true;
            },
            () => {
                return $.mage.__('This email domain is not allowed.');
            }
        );

        return target;
    };
});
