import React, {useEffect, useState} from 'react';
import ReactDOM from "react-dom/client";
export default function Inbox() {

    const [expedientes, setExpedientes] = useState([]);

  /*  useEffect(() => {
        axios.get(route('expediente.index')).then((res) => {
            setExpedientes(res.data);
        });
    },[]);*/

    //console.log(1);

  /*  const openWindowPdf = (url) => {
        const width = 800;
        const height = 800;
        const left = window.innerWidth / 2 - width / 2;
        const top = window.innerHeight / 2 - height / 2;

        window.open('https://docs.google.com/viewer?url='+url+'&embedded=true', 'Floating Window', `width=${width}, height=${height}, left=${left}, top=${top}`);
    }*/

    return (
        <>
           {/* <div className="has-background-light">
                <div className="container pt-4">
                    <table className="table has-background-white is-fullwidth is-striped is-hoverable">
                        <thead>
                        <tr>
                            <th>Nro. Expediente</th>
                            <th>Tipo Doc.</th>
                            <th>Nro. Doc.</th>
                            <th>Remitente</th>
                            <th>Estado</th>
                            <th>Fecha de Registro</th>
                        </tr>
                        </thead>
                        <tbody>
                            {expedientes.map((item) => <tr key={item.id}>
                                <td>{item.codigo}</td>
                                <td>{item.tipo_documento.descripcion}</td>
                                <td>{item.nro_documento}</td>
                                <td>{item.nombre_razonsocial}</td>
                                <td>
                                    <article className="message is-small is-warning">
                                        <strong className="message-body p-0 pl-2 pr-2"> Pendiente</strong>
                                    </article>
                                </td>
                                <td>{item.created_at}</td>
                                <td>ver</td>
                                <td><button className="button is-small is-link" onClick={() => openWindowPdf('https://muniollachea.gob.pe/expedientes/file/'+item.archivo)}>Ver pdf</button></td>
                            </tr>)}
                        </tbody>
                    </table>
                </div>
            </div>*/}

        </>
    );
}
