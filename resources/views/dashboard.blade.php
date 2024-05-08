<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customize and Order Your Pizza') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form id="orderForm">
                        <!-- Pizza Selection -->
                        <div>
                            <label for="pizzaSelect">Choose a pizza:</label>
                            <select id="pizzaSelect" name="pizza" onchange="updatePriceAndToppings()">
                                <option value="Margherita">Margherita</option>
                                <option value="Gimme the Meat">Gimme the Meat</option>
                                <option value="Veggie Delight">Veggie Delight</option>
                                <option value="Make Mine Hot">Make Mine Hot</option>
                            </select>
                        </div>

                        <!-- Size Selection -->
                        <div>
                            <label for="sizeSelect">Size:</label>
                            <select id="sizeSelect" name="size" onchange="updatePrice()">
                                <option value="8">Small</option>
                                <option value="9">Medium</option>
                                <option value="12">Large</option>
                            </select>
                        </div>

                        <!-- Toppings Checklist -->
                        <div id="toppingsList">
                            <!-- Default toppings are dynamically filled based on the selected pizza -->
                        </div>

                        <!-- Additional Toppings -->
                        <div>
                            <p>Add extra toppings (85p each):</p>
                            <div>
                                <input type="checkbox" id="veganCheese" name="additionalToppings" value="0.85"> Vegan Cheese<br>
                                <input type="checkbox" id="pineapple" name="additionalToppings" value="0.85"> Pineapple<br>
                                <!-- More additional toppings here -->
                            </div>
                        </div>

                        <!-- Add to Order Button -->
                        <button type="button" onclick="addToOrder()">Add to Order</button>

                        <!-- Display Order -->
                        <div id="currentOrder">
                            <h3>Current Order</h3>
                            <ul id="orderItems"></ul>
                        </div>

                        <!-- Total Price -->
                        <div id="totalPrice">Total: £0</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    let pizzaPrices = {
        'Margherita': {'8': 8, '9': 9, '12': 12},
        'Gimme the Meat': {'8': 11, '9': 14.50, '12': 16.50},
        'Veggie Delight': {'8': 10, '9': 13, '12': 15},
        'Make Mine Hot': {'8': 11, '9': 13, '12': 15}
    };

    let pizzaToppings = {
        'Margherita': ['Cheese', 'Tomato Sauce'],
        'Gimme the Meat': ['Cheese', 'Tomato Sauce', 'Pepperoni', 'Ham', 'Chicken', 'Minced Beef', 'Sausage', 'Bacon'],
        'Veggie Delight': ['Cheese', 'Tomato Sauce', 'Onions', 'Green Peppers', 'Mushrooms', 'Sweetcorn'],
        'Make Mine Hot': ['Cheese', 'Tomato Sauce', 'Chicken', 'Onions', 'Green Peppers', 'Jalapeno Peppers']
    };

    let totalCost = 0;

    function updatePriceAndToppings() {
        let selectedPizza = document.getElementById('pizzaSelect').value;
        updateToppingsList(selectedPizza);
        updatePrice();
    }

    function updateToppingsList(pizza) {
        let toppingsContainer = document.getElementById('toppingsList');
        toppingsContainer.innerHTML = ''; // Clear existing toppings
        pizzaToppings[pizza].forEach(topping => {
            let label = document.createElement('label');
            let checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.name = 'toppings';
            checkbox.value = topping;
            checkbox.checked = true;
            label.appendChild(checkbox);
            label.appendChild(document.createTextNode(' ' + topping));
            toppingsContainer.appendChild(label);
            toppingsContainer.appendChild(document.createElement('br'));
        });
    }

    function updatePrice() {
        let selectedPizza = document.getElementById('pizzaSelect').value;
        let selectedSize = document.getElementById('sizeSelect').value;
        let basePrice = pizzaPrices[selectedPizza][selectedSize];
        let additionalToppings = document.querySelectorAll('input[name="additionalToppings"]:checked');
        let extraCost = Array.from(additionalToppings).reduce((acc, topping) => acc + parseFloat(topping.value), 0);
        let totalPrice = basePrice + extraCost;
        document.getElementById('totalPrice').textContent = 'Total: £' + totalPrice.toFixed(2);
    }

    function addToOrder() {
        let pizzaName = document.getElementById('pizzaSelect').value;
        let pizzaSize = document.getElementById('sizeSelect').options[document.getElementById('sizeSelect').selectedIndex].text;
        let toppings = Array.from(document.querySelectorAll('input[name="toppings"]:checked')).map(el => el.value).join(', ');
        let orderItemText = `${pizzaSize} ${pizzaName} - Toppings: ${toppings}`;
        let newListItem = document.createElement('li');
        newListItem.textContent = orderItemText;
        document.getElementById('orderItems').appendChild(newListItem);

        // Update total cost
        totalCost += parseFloat(document.getElementById('totalPrice').textContent.split('£')[1]);
        document.getElementById('totalPrice').textContent = 'Running Total: £' + totalCost.toFixed(2);
    }
</script>




