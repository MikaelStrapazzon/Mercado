import { Body, Container, Title } from "./style";

interface CardProps {
    title: string
    body: string
}

export function Card({ title, body }: CardProps) {
    return (
        <Container>
            <Title>
                {title}
            </Title>
            <Body>
                {body}
            </Body>
        </Container>
    );
}