import { Store } from "@ngrx/store";
import { Injectable } from "@angular/core";

import * as actions from "./content.actions";
import { Content } from "../../models";

@Injectable()
export class ContentDispatcher {
    constructor(private store: Store) {
    }

    load() {
        return this.store.dispatch(actions.load());
    }

    select(id: number) {
        return this.store.dispatch(actions.select({id}));
    }

    update(content: Content) {
        return this.store.dispatch(actions.update(content));
    }
}

