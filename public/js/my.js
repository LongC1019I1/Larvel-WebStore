//Ẩn
// $(document).ready(function () {
//     $('#hide-image').click(function () {
//         $('.image-product').hide();
//     })
// });
//Ẩn và hiệ

$(document).ready(function () {
    $('#hide-image').click(function () {
        $('.image-product').toggle();
    });

    $('#size-image').change(function () {
        const MIN_SIZE_IMAGE = 0;
        let sizeImage = $(this).val();
        let elementImage = $('.image-thumbnail-product');

        if (sizeImage > MIN_SIZE_IMAGE) {
            elementImage.each(function (index, item) {
                    console.log(item);
                    item.width = 50 * sizeImage;
                }
            );
        } else {
            alert("eror")
        }
    });
    $('#search-product').keyup(function () {
        let keyword = $(this).val();
        console.log(keyword)
    })
});

