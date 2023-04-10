import ListTax from "./pages/tax";

import { GlobalStyle } from './styles/global';
import { DefaultLayout } from "./layouts/default";

export default function App() {
    // @ts-ignore
    return (
        <>
            <DefaultLayout>
                <ListTax />
            </DefaultLayout>

            <GlobalStyle/>
        </>
    );
}