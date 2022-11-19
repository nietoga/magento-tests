define(['jquery'], ($) => {
    const getRandomColor = () => {
        const letters = '0123456789ABCDEF';
        let color = '#';

        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }

        return color;
    };

    $.widget('mage.rainbowClick', {
        options: {},
        _create: function () {
            $(this.element).click(function () {
                $(this).css('color', getRandomColor());
            });
        },
    });

    return $.mage.rainbowClick;
});
