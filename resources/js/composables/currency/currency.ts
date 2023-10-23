import { ref } from "vue"
export default function currency() {

    interface IsCurrency {
        currency: string;
        style: string;
    }
    const NGN = new Intl.NumberFormat("en-NG", {
        style: "currency",
        currency: "NGN",
    });

    return NGN
}
