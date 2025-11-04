import './bootstrap';
import Swiper from "swiper";
import {Pagination} from "swiper/modules";
import {loadStripe} from '@stripe/stripe-js';

import.meta.glob([
    '../assets/**',
]);


document.addEventListener('DOMContentLoaded', () => {
    new Swiper(".mySwiper", {
        slidesPerView: "auto",
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        modules: [Pagination]
    });


    new Swiper(".swiper-without-pagination", {slidesPerView: "auto", spaceBetween: 40,});


    const addPaymentMethod = async () => {
        const stripe = await loadStripe(formAddPaymentMethod.dataset.key);

        const appearance = {
            style: {
                base: {
                    fontWeight: '500',
                    fontSize: '17px',
                    letterSpacing: '0.025em',
                },
                invalid: {
                    iconColor: '#c4102b',
                    color: '#f50f29',
                },
            }
        }
        let appearanceCardNumber = {...appearance};
        appearanceCardNumber.showIcon = true;

        const elements = stripe.elements();

        const cardNumberElement = elements.create('cardNumber', appearanceCardNumber);
        const cardExpiryElement = elements.create('cardExpiry', appearance);
        const cardCvcElement = elements.create('cardCvc', appearance);


        cardNumberElement.mount('#card-number');
        cardExpiryElement.mount('#card-expiry');
        cardCvcElement.mount('#card-cvc');

        // const cardElement = elements.create('card');
        // cardElement.mount('#card-element');

        formAddPaymentMethod.addEventListener('submit', async (event) => {
            event.preventDefault();
            const cardNameElement = document.getElementById('card-name');
            const { paymentMethod, error } = await stripe.createPaymentMethod({
                type: 'card',
                card: cardNumberElement,
                billing_details: {
                    name: cardNameElement.value
                }
            });

            if (error) {
                const errorContainer = document.getElementById('card-errors');
                errorContainer.textContent = '';
                const errorElement = document.createElement('div');
                errorElement.classList.add('bg-zinc-50', 'my-5', 'p-3', 'rounded-xl', 'border', 'border-red-300', 'text-red-600', 'font-medium');
                errorElement.innerHTML = error.message;
                errorContainer.appendChild(errorElement);
            } else {
                const form = event.target;
                createHiddenInput('card_payment_method_id', paymentMethod.id, form);
                createHiddenInput('card_type', paymentMethod.card.brand, form);
                createHiddenInput('card_number', paymentMethod.card.last4, form);
                createHiddenInput('card_exp_month', paymentMethod.card.exp_month, form);
                createHiddenInput('card_exp_year', paymentMethod.card.exp_year, form);
                form.submit();
            }
        });
    }

    function createHiddenInput(name, value, form) {
        const inputElement = document.createElement('input');
        inputElement.type = 'hidden';
        inputElement.name = name;
        inputElement.value = value;
        form.appendChild(inputElement);
    }
    const formAddPaymentMethod = document.getElementById('form-add-payment-method');

    if(formAddPaymentMethod){
        addPaymentMethod()
    }


})
