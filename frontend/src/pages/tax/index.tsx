import FormNewTax from "./FormNewTax";
import ViewListTax from "./ViewListTax";

import {Container} from "./style";

export default function ListTax() {
    return (
        <Container>
            <FormNewTax />
            <ViewListTax />
        </Container>
    );
}