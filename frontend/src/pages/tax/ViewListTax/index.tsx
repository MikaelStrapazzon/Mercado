import { Container } from "./style";
import { useEffect, useState} from "react";
import { api } from "../../../services/api";
import { Card } from "../../../components/card";

interface tax {
    id: number,
    name: string,
    acronym: string,
    default_percentage_value: string
}

export default function ViewListTax() {
    const [taxes, setTaxes] = useState<tax[]>([]);

    useEffect(() => {
        api.get("tax")
            .then((response) => setTaxes(response.data.data))
    }, []);

    return (
        <Container>
            {taxes.map(tax => {
                return <Card
                    title={ tax.id + ": " + tax.name + " (" + tax.acronym + ")"}
                    body={"Porcentagem de imposto: " + tax.default_percentage_value}
                ></Card>
            })}
        </Container>
    );
}