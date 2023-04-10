import { ReactNode } from "react";

import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faStore } from "@fortawesome/free-solid-svg-icons";

import { Container, MenuBar } from "./style";

interface DefaultLayoutProps {
    children: ReactNode
}

export function DefaultLayout({ children }: DefaultLayoutProps) {
    return (
        <Container>
            <MenuBar>
                <h1>Market</h1>
                <FontAwesomeIcon icon={faStore} />
            </MenuBar>
            {children}
        </Container>
    );
}