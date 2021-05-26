function sortProducts(event)
{
    const currentCategory = parseInt(event.currentTarget.value);
    const productsList = document.querySelectorAll('div.product-item');

    console.log(currentCategory);
    console.log(productsList);

    if (currentCategory == -1)
    {
        productsList.forEach(item => item.classList.remove('hidden'));
    }
    else
    {
        productsList.forEach(item =>
        {
            const itemCategoryID = parseInt(item.dataset.categoryId);

            console.log('itemCategoryID', itemCategoryID)

            if (itemCategoryID !== currentCategory)
            {
                item.classList.add('hidden');
                console.log('Категории не совпадают, накидываем класс')
            }
            else
            {
                console.log('Категории совпадают, убираем класс')
                item.classList.remove('hidden');
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', e => {
    const selectElem = document.getElementById('title-category-select');

    selectElem.addEventListener('change', sortProducts);
})