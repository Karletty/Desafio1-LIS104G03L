const searchName = document.getElementById('name-search');
const searchCategory = document.getElementById('category-search');
const searchMinPrice = document.getElementById('min-price-search');
const searchMaxPrice = document.getElementById('max-price-search');
const btnSearch = document.getElementById('btn-search');
const btnDeleteFilters = document.getElementById('btn-delete-filters');
const params = new URLSearchParams(location.search);


const setParam = (name, value) => {
      if (value)
            params.set(name, value);
      else
            params.delete(name);
}


btnSearch.addEventListener('click', () => {
      setParam('name', searchName.value);
      setParam('category', searchCategory.value);
      setParam('min-price', searchMinPrice.value);
      setParam('max-price', searchMaxPrice.value);
      window.location.href = `${window.location.pathname}?${params.toString()}`;
});

btnDeleteFilters.addEventListener('click', () => {
      window.location.href = window.location.pathname;
})

searchName.value = params.get('name');
searchCategory.value = params.get('category');
searchMinPrice.value = params.get('min-price');
searchMaxPrice.value = params.get('max-price');