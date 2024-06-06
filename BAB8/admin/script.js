document.addEventListener('DOMContentLoaded', function() {
    fetch('get-count.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('user-count-value').textContent = data.user_count;
            document.getElementById('item-count-value').textContent = data.item_count;
            document.getElementById('pembelian-count-value').textContent = data.pembelian_count;
        })
        .catch(error => console.error('Error fetching data:', error));
});
