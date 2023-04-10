import {Container} from "./style";
import {FormEvent} from "react";
import {api} from "../../../services/api";

export default function FormNewTax() {
    const submitNewTax = (event: FormEvent) => {
        event.preventDefault();

        let data = new FormData();
        data.append("name", (document.getElementById('name') as HTMLInputElement).value)
        data.append("acronym", (document.getElementById('acronym') as HTMLInputElement).value)
        data.append("default_percentage_value", (document.getElementById('default_percentage_value') as HTMLInputElement).value)

        api.post("tax", data).then((result) => {
            console.log(result)
        })
    }

    return (
        <Container>
            <form onSubmit={submitNewTax}>
                <label form="name">Nome</label>
                <input id="name" type="text" name="name" />

                <label form="acronym">Sigla</label>
                <input id="acronym" type="text" name="acronym" />

                <label form="default_percentage_value">Porcentagem padrão</label>
                <input id="default_percentage_value" type="number" name="default_percentage_value" step="0.01" />

                <input type="submit" value="Enviar"/>
            </form>
        </Container>
    );
}