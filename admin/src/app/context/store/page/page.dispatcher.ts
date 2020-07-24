import { Store } from "@ngrx/store";
import { Injectable } from "@angular/core";

import * as actions from "./page.actions";
import { Page } from "../../models";


@Injectable()
export class PageDispatcher {
    constructor(private store: Store) {
    }

    load() {
        return this.store.dispatch(actions.load());
    }

    select(id: number) {
        return this.store.dispatch(actions.select({id}));
    }

    update(page: Page) {
        return this.store.dispatch(actions.update(page));
    }
}

