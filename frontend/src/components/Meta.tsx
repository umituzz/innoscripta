import Head from "next/head";
import {HeadComponentInterface} from "@/interfaces/HeadComponentInterface";

export default function Meta({title, description = ''}: HeadComponentInterface) {
    return (
        <Head>
            <title>{title}</title>
            <meta name="description" content={description}/>
            <link
                rel="icon"
                type="image/x-icon"
                href="https://hr.innoscripta.com/favicon.ico"
            />
        </Head>
    );
}
