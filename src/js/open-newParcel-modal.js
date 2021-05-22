function modalHandler(event)
{
    const modalElem = document.querySelector('div.new-income-parcel-modal');

    modalElem.classList.toggle('opened');
}

document.addEventListener('DOMContentLoaded', e=> {
    document.getElementById('openNewParcelModal').addEventListener('click', modalHandler, true);
    document.getElementById('close-modal').addEventListener('click', modalHandler, true);
})