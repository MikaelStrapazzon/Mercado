
import styled from "styled-components";

export const Container = styled.div`
    height: 100vh;
    width: max(100vw, 1920px);
  
    overflow: hidden;
`;

export const MenuBar = styled.div`
    height: 58px;
    width: 100%;
  
    color: aliceblue;
    
    display: flex;
    align-items: center;
    justify-content: center;
    
  
    background: var(--primary-color);

    box-shadow: rgba(50, 50, 93, 0.25) 0 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
  
    svg {
      font-size: 30px;
      
      margin-left: 7px;
    }
`;