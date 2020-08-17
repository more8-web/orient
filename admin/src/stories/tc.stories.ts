import { storiesOf } from "@storybook/angular";
import { TableCellComponent } from "../app/components/table/cells";

storiesOf("Table Cell", module)
    .add('simle cell component', () => ({
        component: TableCellComponent,
        props: {},
    }));
